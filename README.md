# Agriculture Portal

Agriculture Portal is a machine learning-based web application designed to help farmers make informed agricultural decisions. It provides crop prediction, crop recommendation, fertilizer recommendation, rainfall prediction, and yield prediction.

The application also includes farmer and customer modules, crop sales functionality, OTP verification, and optional integrations for weather information, agricultural news, chatbot assistance, and online payments.

**Note:** External API integrations such as News API, OpenWeatherMap, OpenAI, Stripe, and Gmail SMTP require valid credentials and configuration. These credentials have been left blank or disabled in this repository for security reasons. Some integrations will not work until properly configured.

## Technologies Used

- Python
- PHP
- MySQL
- Pandas
- NumPy
- JavaScript
- HTML and CSS
- Bootstrap 4
- Scikit-learn

## Prerequisites

Install the following software before running the project:

- XAMPP (Apache and MySQL)
- Python 3
- Git
- A web browser

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/nithinkumar888/agriculture-portal.git
   ```

2. Move the project folder into your XAMPP `htdocs` directory.

3. Start Apache and MySQL using the XAMPP Control Panel.

4. Open phpMyAdmin and create a database named:

   ```text
   agriculture_portal
   ```

5. Import the SQL file from the project's `db` folder into the database.

6. Check the database connection settings in `sql.php`. The default local configuration uses:

   - Host: `localhost`
   - Username: `root`
   - Password: blank
   - Database: `agriculture_portal`

   Change these settings if your local MySQL configuration is different.

7. Open the project in your browser using the appropriate local URL, for example:

   ```text
   http://localhost/agriculture-portal/
   ```

8. For Python-based machine learning features, open a terminal in the `farmer` directory and install the required packages if a `requirements.txt` file is present:

   ```bash
   pip install -r requirements.txt
   ```

## External Service Configuration

The following integrations require additional setup:

- **Gmail SMTP:** Configure valid Gmail SMTP credentials or an app password to enable OTP emails.
- **News API:** Configure a valid News API key to enable agricultural news.
- **OpenWeatherMap:** Configure a valid API key to enable weather forecasts.
- **OpenAI:** Configure an API key to enable chatbot and AI-based features.
- **Stripe:** Configure Stripe test or live keys securely before enabling online payments.

Do not commit API keys, passwords, database credentials, or other secrets to GitHub. Use environment variables or another secure configuration method.

These integrations are not guaranteed to work until they have been configured.

## Features

- Crop Prediction
- Crop Recommendation
- Fertilizer Recommendation
- Rainfall Prediction
- Yield Prediction
- Farmer and Customer Modules
- OTP Verification through email (requires SMTP configuration)
- Agricultural News (requires News API configuration)
- Chatbot (requires OpenAI configuration)
- Weather Forecast (requires weather API configuration)
- Crop Sales and Online Payments (requires Stripe configuration)

## Dataset

### Crop Prediction Dataset

- State_Name
- District_Name
- Season
- Crop

### Crop Recommendation Dataset

- N
- P
- K
- Temperature
- Humidity
- pH
- Rainfall
- Label

### Fertilizer Recommendation Dataset

- Temperature
- Humidity
- Soil Moisture
- Soil Type
- Crop Type
- Nitrogen
- Phosphorous
-