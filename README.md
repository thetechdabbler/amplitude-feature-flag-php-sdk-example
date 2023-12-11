# A quick demo of Amplitude Feature Flag Using PHP SDK

## Getting Started

### Prerequisites

Docker and Docker Compose

### Installing

1. Clone this repo
2. Run `docker-compose up -d`
3. Run `docker exec -it amplitude-app-1 composer install`

### Configuring

1. Create a `.env` file in the root directory of this project
2. Add your Amplitude API key to the `.env` file as `AMPLITUDE_API_KEY=your_api_key`

### Running the app

Visit http://localhost:8080 in your browser.
Play around with the feature flag by changing the value of values in the `index.php` file.
