<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\File;

/**
 * @extends ModelResource<Image>
 */
class ImageResource extends ModelResource
{
    protected string $model = Image::class;

    protected string $title = 'Images';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('name'),
            File::make('path'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            ID::make(),
            Text::make('name'),
            File::make('path'),
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('name'),
            File::make('path'),
        ];
    }

    /**
     * @param Image $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
