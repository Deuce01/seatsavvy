# SeatSavvy POS - Smart Table Reservation System

SeatSavvy is a sophisticated Point of Sale (POS) system for managing smart table reservations at restaurants. It provides a seamless experience for administrators, cashiers, and customers, ensuring an efficient and user-friendly platform for restaurant operations.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Overview

SeatSavvy POS is designed to enhance the restaurant experience for both customers and staff. With an artistic and ambient design, the system is aimed at providing an effortless process for table reservations, order management, and payment processing.

### Main Features:
- **Admin Dashboard:** Manage reservations, view reports, and oversee restaurant operations.
- **Cashier Interface:** Manage customer orders and payments in real-time.
- **Customer Interface:** Easily make table reservations and view order statuses.
- **Responsive Design:** Mobile-friendly and adaptable to different devices for smooth customer interaction.
- **Ambient Aesthetic:** Designed to match the soothing environment of an ambient restaurant setting.

## Features

- **Table Reservation:** Customers can view available tables and make reservations in real time.
- **Admin Controls:** Restaurant administrators can manage reservations, order statuses, and view reports.
- **Payment Integration:** Customers can complete their payments via integrated payment gateways.
- **Intuitive User Interface:** Clean, minimalistic design for an optimal user experience.
- **Responsive:** Optimized for all screen sizes.

## Tech Stack

- **Frontend:**
  - HTML5
  - TailwindCSS
  - JavaScript (Vanilla)
  - Google Fonts
  
- **Backend:**
  - PHP
  - MySQL (for Database Management)

- **Hosting/Deployment:**
  - Web hosting that supports PHP and MySQL (e.g., Apache, Nginx)

## Installation

### Prerequisites
Before you begin, ensure that you have the following installed on your machine:

- A local server like XAMPP, MAMP, or WAMP for running PHP and MySQL.
- A web browser (Chrome, Firefox, Safari, etc.).
- A code editor (VS Code, Sublime Text, etc.).

### Steps to Install

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/deuce01/seatsavvy.git
    ```

2. **Setup Local Development Environment:**
   - Place the project files in the **htdocs** (XAMPP) or **www** (WAMP) directory.
   - Create a database in MySQL and import the SQL file located in the `database` folder (or create it manually with appropriate tables).

3. **Configure Database:**
   - Open the `config.php` file in the root directory and set your MySQL connection parameters (username, password, database name).

4. **Run the Project:**
   - Start your local server (Apache and MySQL) and navigate to `http://localhost/seatsavvy` in your web browser.
   
   You should now be able to access the SeatSavvy POS system.

## Usage

- **Admin Panel:** Navigate to the `admin` link to manage reservations, view customer orders, and generate reports.
- **Cashier Panel:** Use the `cashier` link to manage order processing and payments.
- **Customer Panel:** Customers can visit the `customer` link to make table reservations and view order statuses.

## Contributing

We welcome contributions to SeatSavvy! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Make your changes and commit (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a new pull request.

## License

SeatSavvy POS is licensed under the MIT License. See [LICENSE](LICENSE) for more details.

---

**SeatSavvy POS** is developed with love to enhance the dining experience at restaurants. Feel free to use and contribute to this project!
