<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Film;
use Exception;
use Illuminate\Support\Facades\Log;


final readonly class SearchFilms
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $keyword = $args["keyword"] ?? null;
        $minReleaseYear = $args["minReleaseYear"] ?? null;
        $maxLength = $args["maxLength"] ?? null;
        $minLength = $args["minLength"] ?? null;
        $perPage = $args["perPage"] ?? 10;
        $page = $args["page"];
    
        $films = Film::query();
       
        if($keyword !== null) {
            $films = $films->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%');
        }

        if($minReleaseYear !== null) {
           $films = $films->where('release_year', '>=', $minReleaseYear);
        }

        if ($minLength !== null && $maxLength !==null )
        {

            $films = $films->whereBetween('length', [intval($minLength), intval($maxLength)]);
        }
        else if ($minLength !== null) {
            $films = $films->where('length', '>=', intval($minLength));
                  
        }
        else if ($maxLength !== null) {
           $films =  $films->where('length', '<=', intval($maxLength));
        }

        $paginatedFilms = $films->paginate($perPage, ['*'], 'page', $page);
        return [
            'data' => $paginatedFilms->items(),
            'paginatorInfo' => [
                'currentPage' => $paginatedFilms->currentPage(),
                'lastPage' => $paginatedFilms->lastPage()
            ],
        ];
    }
}
