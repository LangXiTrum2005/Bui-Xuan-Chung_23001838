<?php

function escapeHtml($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function redirectTo(string $page): void
{
    header('Location: ' . $page);
    exit;
}

function positiveId($value): ?int
{
    if (!is_scalar($value)) {
        return null;
    }

    $id = filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    return $id === false ? null : $id;
}

function validateProduct(array $input): array
{
    $name = isset($input['name']) && is_string($input['name']) ? trim($input['name']) : '';
    $price = isset($input['price']) && is_string($input['price']) ? trim($input['price']) : '';
    $quantity = isset($input['quantity']) && is_string($input['quantity']) ? trim($input['quantity']) : '';

    if ($name === '') {
        return [$name, $price, $quantity, 'Tên sản phẩm không được để trống.'];
    }
    if (mb_strlen($name, 'UTF-8') > 100) {
        return [$name, $price, $quantity, 'Tên sản phẩm không được quá 100 ký tự.'];
    }
    if (!preg_match('/^\d{1,8}(?:\.\d{1,2})?$/', $price) || (float) $price <= 0) {
        return [$name, $price, $quantity, 'Giá phải lớn hơn 0 và có tối đa 2 chữ số thập phân.'];
    }
    if ($quantity === '' || !ctype_digit($quantity) || (float) $quantity > 2147483647) {
        return [$name, $price, $quantity, 'Số lượng phải là số nguyên không âm.'];
    }

    return [$name, $price, (int) $quantity, ''];
}
