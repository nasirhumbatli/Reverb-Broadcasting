# 🔴 Laravel Broadcasting + Reverb + Echo
### Real-Time Example with Redis + WebSockets

This repository demonstrates how to build a **real-time Laravel application** using:

- ✅ Laravel Broadcasting Events
- ✅ Reverb (Laravel's official WebSocket server)
- ✅ Laravel Echo (frontend JS WebSocket client)
- ✅ Redis Queue Driver (for production-ready speed)
- ✅ Public & Private Channels

It simulates a basic notification system where events are fired via backend jobs and delivered to the frontend using WebSockets — no polling required.

---

## 🚀 Technologies Used

| Tool             | Purpose                      |
| ---------------- | ---------------------------- |
| **Laravel 12**   | Backend framework            |
| **Laravel Echo** | Frontend WebSocket listener  |
| **Reverb**       | Self-hosted WebSocket server |
| **Redis Queue**  | Fast in-memory job queue     |
| **Blade / JS**   | Frontend interface           |



## 📦 Setup Instructions

1. **Clone the repo**
```
git clone https://github.com/nasirhumbatli/Reverb-Broadcasting.git
cd Reverb-Broadcasting
```

2. **Install dependencies**
```
composer install
npm install && npm run dev
```

3. **Create .env file**
```
cp .env.example .env
```

4. **Set up .env**
```
BROADCAST_CONNECTION=reverb
QUEUE_CONNECTION=redis
CACHE_STORE=redis
REDIS_CLIENT=predis

```
Don’t forget to set other required `.env` values like `APP_KEY, DB_DATABASE,...` etc.
```
Run the following to set up Reverb config and generate required keys:

php artisan reverb:install
```

5. **Migrations**
```
php artisan migrate
```

6. **Run services**
```
php artisan serve
php artisan reverb:start
php artisan queue:work -v  // verbose output is helpful :)
```

7. **Broadcasting Entry Points:**
- This project demonstrates two types of real-time broadcasting:

1. Direct Event Trigger (Artisan Command)
```
php artisan notify:maintenance
```
- You’ll be prompted with:
```
What message should be sent to users about the maintenance?
```
Enter any custom message — it will be broadcast to connected clients immediately.

2. Queued Event via Job Dispatch
- Visit this route in your browser:
```
/managers/backup
```
- This dispatches a queued job (ExportSystemManagersBackup), which fires the event ManagersBackupExportedEvent.

After ~5 seconds, you’ll see the real-time update appear on the page via WebSocket.

