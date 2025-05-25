# Service Container Payment Mock

This project is a mini implementation designed to explore **Service Container** and **Dependency Injection** concepts. It provides a mock abstraction of payment providers, simulating payment processing with fictional responses.

## Features

-   **Service Container**: Demonstrates dependency injection and service resolution.
-   **Payment Providers**: Includes multiple mock payment providers:
    -   `PromptPaymentProvider`
    -   `BrutePaymentProvider`
    -   `PagaFacilPaymentProvider`
-   **Checkout Service**: Handles payment processing using the injected payment provider.
-   **PSR-4 Autoloading**: Configured via Composer for namespace-based class loading.

## Project Structure

```
/src
  /PaymentProviders
    PromptPaymentProvider.php
    BrutePaymentProvider.php
    PagaFacilPaymentProvider.php
  CheckoutService.php
  ServiceContainer.php
/composer.json
```

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/service-container-payment-mock.git
    ```
2. Navigate to the project directory:
    ```bash
    cd service-container-payment-mock
    ```
3. Install dependencies using Composer:
    ```bash
    composer install
    ```

## Usage

To simulate a payment process, you can use the `CheckoutService` with any of the provided payment providers. For example, to use the `PromptPaymentProvider`:

```php
$container = new ServiceContainer();
$container->set('payment.provider', new PromptPaymentProvider());

$checkoutService = new CheckoutService($container);
$response = $checkoutService->processPayment($orderDetails);
```

## Testing

To run the included tests:

```bash
composer test
```

## License

This project is open-source and available under the [MIT License](LICENSE).
