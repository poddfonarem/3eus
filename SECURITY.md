# Security Policy

## Supported Versions

We provide security updates for the following versions:

| Version | Supported          |
| ------- | ------------------ |
| Main    | :white_check_mark: |
| >=2.1   | :white_check_mark: |
| <=2.0   | :x:                |

## Reporting a Vulnerability

**Please do not report security vulnerabilities through public GitHub issues.**

If you discover a potential security flaw in **3eus**, please report it privately:
1. Use the **"Report a vulnerability"** button under the [Security tab](https://github.com/poddfonarem/3eus/security) on GitHub.
2. Provide a detailed description, including code snippets or steps to reproduce (PoC).

We aim to acknowledge all reports within **24-48 hours** and provide a fix as quickly as possible.

## Core Security Principles of 3eus
To keep your application secure, this template follows these practices:
* **Prepared Statements:** The PDO-based Model uses prepared statements to prevent SQL Injection.
* **Separation of Concerns:** Routing and Logic are separated to prevent unauthorized file execution.
* **Configuration:** Sensitive data (DB credentials) is stored in config files that should be excluded from public access.

## User Responsibility
When using this template, you are responsible for:
* **Input Validation:** Always validate and sanitize user input in your Controllers.
* **XSS Protection:** Use `htmlspecialchars()` or a template engine equivalent when rendering data in Views.
* **Deployment:** Ensure your `.env` or config files are not accessible via the web server.

---
*Your help in keeping 3eus secure is greatly appreciated!*
