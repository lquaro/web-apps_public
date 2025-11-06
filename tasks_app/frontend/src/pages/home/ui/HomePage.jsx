import { useEffect, useState } from 'react'
import { TaskApi } from '@/entities/task/api/taskApi'
import TaskList from '@/entities/task/ui/TaskList'

export default function HomePage() {
    const [tasks, setTasks] = useState([])
    const [loading, setLoading] = useState(true)
    const [error, setError] = useState(null)

    useEffect(() => {
        TaskApi.list()
            .then(setTasks)
            .catch(e => setError(e.message))
            .finally(() => setLoading(false))
    }, [])

    async function toggleDone(task) {
        try {
            const updated = await TaskApi.patch(task.id, { done: !task.done })
            setTasks(prev => prev.map(t => t.id === updated.id ? updated : t)) // иммутабельность
        } catch (e) { setError(e.message) }
    }

    if (loading) return <p>Loading…</p>
    if (error) return <p className="text-red-600">Ошибка: {error}</p>

    return (
        <div className="p-6 max-w-xl">
            <h1 className="text-2xl font-bold mb-4">Tasks</h1>
            <TaskList items={tasks} onToggle={toggleDone} />
        </div>
    )
}