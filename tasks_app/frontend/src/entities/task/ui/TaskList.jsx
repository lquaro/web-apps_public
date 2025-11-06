export default function TaskList({ items, onToggle }) {
    return (
        <ul className="space-y-2">
            {items.map(t => (
                <li key={t.id} className="flex items-center gap-2">
                    <input
                        type="checkbox"
                        checked={t.done}
                        onChange={() => onToggle(t)}
                    />
                    <span className={t.done ? 'line-through text-gray-500' : ''}>
            {t.title}
          </span>
                </li>
            ))}
        </ul>
    )
}