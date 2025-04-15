<?php

namespace App\MoonShine\Resources;

use App\Models\Discount;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Select;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;

/**
 * @extends ModelResource<Discount>
 */
class DiscountResource extends ModelResource
{
    protected string $model = Discount::class;
    protected string $title = 'Discounts';

    public function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name'),
            Select::make('Discount (%)', 'discount_price')
                ->options(array_combine(range(1, 100), array_map(fn($i) => "$i%", range(1, 100))))
                ->required(),
            Date::make('Start Date', 'start_date'),
            Date::make('End Date', 'end_date'),
            // BelongsToMany maydonini index jadvalida ko‘rsatmaymiz
        ];
    }

    public function formFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Name', 'name')->required(),
            Select::make('Discount (%)', 'discount_price')
                ->options(array_combine(range(1, 100), array_map(fn($i) => "$i%", range(1, 100))))
                ->required(),
            Date::make('Start Date', 'start_date')->required(),
            Date::make('End Date', 'end_date')->required(),
            BelongsToMany::make('Products', 'products', fn($item) => $item->name)
                ->selectMode(),
        ];
    }

    public function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Name', 'name'),
            Select::make('Discount (%)', 'discount_price')
                ->options(array_combine(range(1, 100), array_map(fn($i) => "$i%", range(1, 100)))),
            Date::make('Start Date', 'start_date'),
            Date::make('End Date', 'end_date'),
            BelongsToMany::make('Products', 'products', fn($item) => $item->name),
        ];
    }

    public function rules($item): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'discount_price' => ['required', 'numeric', 'between:1,100'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'products' => ['sometimes', 'array'],
            'products.*' => ['exists:products,id'],
        ];
    }
}
