const BASE = '/api'

export async function api(path, options = {}) {
    const res = await fetch(BASE + path, {
        headers: { 'Content-Type': 'application/json', ...(options.headers || {}) },
        ...options,
    })
    if (!res.ok) {
        const text = await res.text()
        throw new Error(`HTTP ${res.status}: ${text}`)
    }
    const ct = res.headers.get('Content-Type') || ''
    return ct.includes('application/json') ? res.json() : res.text()
}