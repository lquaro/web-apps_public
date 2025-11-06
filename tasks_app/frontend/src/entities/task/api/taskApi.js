import { api } from '@/shared/api/client'

export const TaskApi = {
    list() { return api('/tasks/') },
    create(data) { return api('/tasks/', {method: 'POST', body: JSON.stringify(data) }) },
    patch(id, data) { return api(`/tasks/${id}/`, { method: 'PATCH', body: JSON.stringify(data) }) },
}