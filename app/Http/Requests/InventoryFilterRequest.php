<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class InventoryFilterRequest extends FormRequest
{
    protected $redirectRoute = 'inventory.index';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q' => ['nullable', 'string', 'max:100'],
            'brand' => ['nullable', 'string', 'max:100'],
            'model' => ['nullable', 'string', 'max:100'],
            'condition' => ['nullable', Rule::in(['foreign_used', 'locally_used'])],
            'body_type' => ['nullable', 'string', 'max:50'],
            'cylinders' => ['nullable', 'integer', 'between:1,16'],
            'doors' => ['nullable', 'integer', 'between:1,8'],
            'drivetrain' => ['nullable', Rule::in(['2wd', '4wd', 'awd', 'fwd', 'rwd'])],
            'transmission' => ['nullable', Rule::in(['automatic', 'manual', 'cvt', 'dct'])],
            'fuel_type' => ['nullable', Rule::in(['petrol', 'diesel', 'hybrid', 'electric'])],
            'exterior_color' => ['nullable', 'string', 'max:50'],
            'min_price' => ['nullable', 'numeric', 'min:0', 'max:9999999999999.99'],
            'max_price' => ['nullable', 'numeric', 'min:0', 'max:9999999999999.99'],
            'min_year' => ['nullable', 'integer', 'between:1900,'.(now()->year + 1)],
            'max_year' => ['nullable', 'integer', 'between:1900,'.(now()->year + 1)],
            'max_mileage' => ['nullable', 'integer', 'min:0', 'max:9999999'],
            'sort' => ['nullable', Rule::in(['newest', 'price_low', 'price_high', 'year', 'mileage'])],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator): void {
                if ($this->hasValidRange('min_price', 'max_price')) {
                    $validator->errors()->add('max_price', 'The maximum price must be greater than or equal to the minimum price.');
                }

                if ($this->hasValidRange('min_year', 'max_year')) {
                    $validator->errors()->add('max_year', 'The maximum year must be greater than or equal to the minimum year.');
                }
            },
        ];
    }

    private function hasValidRange(string $minimum, string $maximum): bool
    {
        return $this->filled($minimum)
            && $this->filled($maximum)
            && $this->input($minimum) > $this->input($maximum);
    }
}
