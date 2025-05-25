# Service Container Payment Mock

This project is a mini implementation designed to explore **Service Container** and **Dependency Injection** concepts. It provides a mock abstraction of payment providers, simulating payment processing with fictional responses.

## Features

-   **Service Container**: Implements a custom service container for dependency injection and service resolution.
-   **Payment Providers**: Includes multiple mock payment providers:
    -   `PromptPaymentProvider`
    -   `BrutePaymentProvider`
    -   `PagaFacilPaymentProvider`
-   **Checkout Service**: Handles payment processing using the injected payment provider.
-   **PSR-4 Autoloading**: Configured via Composer for namespace-based class loading.

## Project Structure

```
/src
  /Core
    Container.php
  /Providers
    /Abstracts
      AbstractPaymentProvider.php
    /Interfaces
      PaymentProviderInterface.php
    BrutePaymentProvider.php
    PagaFacilPaymentProvider.php
    PromptPaymentProvider.php
  /Services
    Checkout.php
  /Utils
    Http.php
/bootstrap
  container.php
/public
  index.php
```

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/service-container-payment-mock.git
    cd service-container-payment-mock
    ```
2. Install dependencies:
    ```bash
    composer install
    ```
3. Run the application using the sail script:
    ```bash
    ./sail php public/index.php
    ```

## Usage

The application simulates a payment process using the Checkout service and a selected payment provider.
The service container resolves dependencies automatically.

### Example Workflow

1. The `public/index.php` file initializes the service container from `bootstrap/container.php`:

    ```php
    $container = require __DIR__ . '/../bootstrap/container.php';
    ```

2. A payment provider is resolved from the container:

    ```php
    $provider = $container->get(PagaFacilPaymentProvider::class);
    ```

3. The Checkout service processes the payment:

    ```php
    $checkout = new Checkout('customer@example.com', 1000);
    print_r($checkout->handle($provider));
    ```

4. Run the script using the sail command:

    ```bash
    ./sail php public/index.php
    ```

### Example Output

```json
{
    "status": "success",
    "message": "Payment processed successfully",
    "email": "customer@example.com",
    "amount": 1000,
    "transaction_id": "txn_123456",
    "currency": "USD",
    "timestamp": 1690000000,
    "payment_method": "credit_card",
    "payment_status": "completed"
}
```

## What's Inside the sail Script?

The sail script is a custom shell script that simplifies running commands in a specific environment, such as a Docker container. Here's what it typically does:

-   **Environment Setup**: Configures environment variables and paths required for the project.
-   **Command Execution**: Forwards the provided command (e.g., `php public/index.php`) to the appropriate environment.
-   **Docker Integration**: If Docker is used, it likely runs the command inside a Docker container using `docker-compose exec` or similar commands.

For this project, the sail script ensures that the PHP script runs in the correct environment, making it easy to execute and test the application.

## Adding a New Payment Provider

1. Create a new class in `src/Providers/` that extends `AbstractPaymentProvider`.
2. Implement the `currency()` method to define the provider's currency.
3. Register the new provider in the service container (`bootstrap/container.php`).
4. Use the new provider in `public/index.php`.

## License

This project is licensed under the MIT License.

## Author

Created by Yan Brasiliano Silva Penalva.
