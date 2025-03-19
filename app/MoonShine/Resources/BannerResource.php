<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banner;

use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Banner>
 */
class BannerResource extends ModelResource
{
    protected string $model = Banner::class;

    protected string $title = 'TopBanners';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Title'),
            Text::make('Description'),
            Image::make('Image'),
            Select::make('Position')
            ->options([
                'top'=>'top',
                'middle'=>'middle',
                'one_bottom'=>'one_bottom',
                'bottom'=>'bottom'            ])->nullable(),
            BelongsTo::make('Category','category',
                    fn($item)=>$item->id . ". " . $item->name,
                    CategoryResource::class)->nullable()
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
                Text::make('Title'),
                Text::make('Description'),
                Image::make('Image'),
                Select::make('Position')
                ->options([
                    'top'=>'top',
                    'middle'=>'middle',
                    'one_bottom'=>'one_bottom',
                    'bottom'=>'bottom'
                ])->nullable(),
                BelongsTo::make('Category','category',
                        fn($item)=>$item->id . ". " . $item->name,
                        CategoryResource::class)->nullable()
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
            Text::make('Title'),
            Text::make('Description'),
            Image::make('Image'),
            Select::make('Position')
            ->options([
                'top'=>'top',
                'middle'=>'middle',
                'one_bottom'=>'one_bottom',
                'bottom'=>'bottom'            ])->nullable(),
            BelongsTo::make('Category','category',
                    fn($item)=>$item->id . ". " . $item->name,
                    CategoryResource::class)->nullable()
        ];
    }

    /**
     * @param Banner $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
