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
                ->options([10 => '10%', 20 => '20%', 30 => '30%', 40 => '40%', 50 => '50%', 60 => '60%', 70 => '70%', 80 => '80%', 90 => '90%', 100 => '100%']),
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
