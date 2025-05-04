<?php

namespace Portfolio\Forms;

class ContactForm
{

    public static function handle(array $data): void
    {
        wp_insert_post([
            'post_type' => 'contact_message',
            'post_title' => $data['first_name'] . ' ' . $data['last_name'],
            'post_content' => self::generateEmailContent($data),
            'post_status' => 'publish'
        ]);

        wp_mail(
            to: 'lorian.flamant05@gmail.com',
            subject: 'Nouveau message de contact',
            message: self::generateEmailContent($data),
        );

        $_SESSION['contact_form_success'] = 'Merci, ' . $data['first_name'] . '! Votre message a bien été envoyé.';
        wp_safe_redirect($_SERVER['HTTP_REFERER']);
        exit();
    }

    protected static function generateEmailContent(array $data): string
    {
        return 'Bonjour,' . PHP_EOL
            . 'Vous avez un nouveau message de ' . $data['first_name'] . ' ' . $data['last_name'] . ':' . PHP_EOL
            . $data['message'] . PHP_EOL . PHP_EOL
            . '----' . PHP_EOL
            . 'Adresse mail: ' . $data['email'];
    }

    public static function required(string $field_name): bool
    {
        if (
            !array_key_exists($field_name, $_REQUEST)
            || trim($_REQUEST[$field_name]) === ''
        ) {
            $_SESSION['errors'][$field_name] = 'Ce champ est obligatoire !';

            return false;
        }

        return true;
    }

    public static function email($field_name): bool
    {
        if (
            array_key_exists($field_name, $_REQUEST) &&
            trim($_REQUEST[$field_name]) !== '' &&
            !filter_var(trim($_REQUEST[$field_name]), FILTER_VALIDATE_EMAIL)
        ) {
            $_SESSION['errors'][$field_name] = 'Veuillez renseigner une adresse mail valide !';

            return false;
        }

        return true;
    }

    public static function check(array $constraints): void
    {
        try {
            self::parse_constraints($constraints);
        } catch (ValidationRuleNotFoundException $e) {
            exit($e->getMessage());
        }

        if (isset($_SESSION['errors'])) {
            $_SESSION['old'] = $_REQUEST;
            $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/';
            http_response_code('303');
            header("Location: $previousUrl");
            exit;
        }
    }

    /**
     * @throws ValidationRuleNotFoundException
     */
    protected static function parse_constraints(array $constraints): void
    {
        $method = '';
        foreach ($constraints as $field_name => $constraint) {
            $array_rules = explode('|', $constraint);
            foreach ($array_rules as $method) {
                if (!method_exists(__CLASS__, $method)) {
                    throw new ValidationRuleNotFoundException($method);
                }
                self::$method($field_name);
            }
        }
    }
}