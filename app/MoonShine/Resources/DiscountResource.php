<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\BelongsToMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;


/**
 * @extends ModelResource<Discount>
 */
class DiscountResource extends ModelResource
{
    protected string $model = Discount::class;

    protected string $title = 'DiscountWeights';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('name', 'Chegirma nomi')->required(),
            Number::make('percentage', 'Foiz (%)')->required()->min(1)->max(100),
            Date::make('start_date', 'Qachondan')->required(),
            Date::make('end_date', 'Qachongacha')->required(),
            BelongsToMany::make('products', 'Mahsulotlar')->async(),
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
                Text::make('name', 'Chegirma nomi')->required(),
                Number::make('percentage', 'Foiz (%)')->required()->min(1)->max(100),
                Date::make('start_date', 'Qachondan')->required(),
                Date::make('end_date', 'Qachongacha')->required(),
                BelongsToMany::make('products', 'Mahsulotlar')->async(),
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
            Text::make('name', 'Chegirma nomi')->required(),
            Number::make('percentage', 'Foiz (%)')->required()->min(1)->max(100),
            Date::make('start_date', 'Qachondan')->required(),
            Date::make('end_date', 'Qachongacha')->required(),
            BelongsToMany::make('products', 'Mahsulotlar')->async(),
        ];
    }

    /**
     * @param Discount $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
