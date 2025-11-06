import React from 'react'
import ReactDOM from 'react-dom/client'
import App from '@/app/App.jsx'   // алиас '@' -> 'src'
import './index.css'              // глобальные стили + tailwind

ReactDOM.createRoot(document.getElementById('root')).render(
    <React.StrictMode>
        <App />
    </React.StrictMode>
)