# 🐳 Simple Apache Webserver with Docker Compose

A super simple Docker Compose setup to replace XAMPP for local development.

I built this because I was tired of running into endless XAMPP errors.

⚠️ **This setup is only for local development!**
It's completely insecure and **not meant for production** — unless you’re trying to get fired instantly. 😬

---

## 🚀 Getting Started

### Prerequisites

* [Docker Compose](https://docs.docker.com/compose/)

### Run It

Once Docker Compose is installed, you're good to go:

```bash
docker compose up -d
```

That's it. No pain. You're welcome.

---

## 🗺️ Roadmap

Here’s what I’m planning to add:

* [x] Basic Apache + PHP + MySQL setup
* [ ] Local DNS server
* [ ] .env file support for custom config
* [ ] Multiple PHP version support (e.g. switch between 7.4, 8.0, 8.3)
* [ ] dashboard to manage containers?

