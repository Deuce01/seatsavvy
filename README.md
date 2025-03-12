# Django Restaurant Reservation System

This project is a Django-based restaurant reservation system that includes the following features:
- Landing page for customers
- Admin dashboard
- Receipts for transactions as PDFs
- Analytics and reports

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd django-restaurant-reservation
   ```

2. Create and activate a virtual environment:
   ```bash
   python -m venv venv
   source venv/bin/activate  # On Windows use `venv\Scripts\activate`
   ```

3. Install the required dependencies:
   ```bash
   pip install -r requirements.txt
   ```

4. Apply migrations:
   ```bash
   python manage.py migrate
   ```

5. Create a superuser for accessing the admin dashboard:
   ```bash
   python manage.py createsuperuser
   ```

6. Run the development server:
   ```bash
   python manage.py runserver
   ```

7. Open your browser and go to `http://127.0.0.1:8000` to access the landing page.
   Go to `http://127.0.0.1:8000/admin` to access the admin dashboard.

## Apps Structure

- `landing`: Handles the landing page for customers.
- `reservations`: Manages reservations and customer data.
- `admin_dashboard`: Admin interface for managing the restaurant.
- `receipts`: Generates PDF receipts for transactions.
- `analytics`: Provides analytics and reports.

## Dependencies

- Django
- reportlab (for PDF generation)
- Bootstrap (for styling)

## License

