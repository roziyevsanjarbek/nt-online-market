<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\DiscountWeight;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;

/**
 * @extends ModelResource<DiscountWeight>
 */
class DiscountWeightResource extends ModelResource
{
    protected string $model = DiscountWeight::class;

    protected string $title = 'DiscountWeights';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Product', 'product', 'name')->searchable(),
            Number::make('Discount Price', 'discount_price')
                ->min(0)
                ->step(0.01)
                ->required(),
            Number::make('Weight', 'weight')
                ->min(0)
                ->step(0.01)
                ->required(),
            Date::make('Discount Start', 'discount_start')->format('Y-m-d')->nullable(),
            Date::make('Discount End', 'discount_end')->format('Y-m-d')->nullable(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                BelongsTo::make('Product', 'product', 'name')->searchable(),
                Number::make('Discount Price', 'discount_price')
                    ->min(0)
                    ->step(0.01)
                    ->required(),
                Number::make('Weight', 'weight')
                    ->min(0)
                    ->step(0.01)
                    ->required(),
                Date::make('Discount Start', 'discount_start')->format('Y-m-d')->nullable(),
                Date::make('Discount End', 'discount_end')->format('Y-m-d')->nullable(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            BelongsTo::make('Product', 'product', 'name')->searchable(),
            Number::make('Discount Price', 'discount_price')
                ->min(0)
                ->step(0.01)
                ->required(),
            Number::make('Weight', 'weight')
                ->min(0)
                ->step(0.01)
                ->required(),
            Date::make('Discount Start', 'discount_start')->format('Y-m-d')->nullable(),
            Date::make('Discount End', 'discount_end')->format('Y-m-d')->nullable(),
        ];
    }

    /**
     * @param DiscountWeight $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
