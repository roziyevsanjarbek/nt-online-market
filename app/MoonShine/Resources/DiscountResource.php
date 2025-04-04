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
class DiscountResource extends ModelResource {
    protected string $model = Discount::class;
    protected string $title = 'Discounts';

    protected function indexFields(): iterable {
        return [
            ID::make()->sortable(),
            Text::make('Name'),
            Select::make('Discount (%)', 'discount_price')
                ->options(array_combine(range(1, 100), array_map(fn($i) => "$i%", range(1, 100))))
                ->required(),
            Date::make('Start Date', 'start_date'),
            Date::make('End Date', 'end_date'),
            BelongsToMany::make('Products', 'products', fn($item) => $item->name),
        ];
    }

    protected function formFields(): iterable {
        return $this->indexFields();
    }

    protected function detailFields(): iterable {
        return $this->indexFields();
    }
}
