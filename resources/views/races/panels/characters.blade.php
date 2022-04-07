<?php
/**
 * @var \App\Models\Race $model
 * @var \App\Models\Character $character
 */
$filters = [];
$allMembers = true;
if (!request()->has('all_members')) {
    //$filters['race_id'] = $model->id;
    $allMembers = false;
}
$datagridSorter = new \App\Datagrids\Sorters\RaceCharacterSorter();
$datagridSorter->request(request()->all());

?>
<div class="box box-solid" id="race-characters">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('races.show.tabs.characters') }}</h3>

        <div class="box-tools pull-right">
            @if (!$allMembers)
                <a href="{{ route('races.show', [$model, 'all_members' => true, '#race-characters']) }}" class="btn btn-default btn-sm">
                    <i class="fa fa-filter"></i> {{ __('crud.filters.all') }} ({{ $model->allCharacters(true)->has('entity')->count() }})
                </a>
            @else
                <a href="{{ route('races.show', [$model, '#race-characters']) }}" class="btn btn-default btn-sm">
                    <i class="fa fa-filter"></i> {{ __('crud.filters.direct') }} ({{ $model->allCharacters(false)->has('entity')->count() }})
                </a>
            @endif
        </div>
    </div>
    <div class="box-body">

        <p class="help-block">
            {{ __('races.characters.helpers.' . ($allMembers ? 'all_' : null) . 'characters') }}
        </p>

        <div class="">
            @include('cruds.datagrids.sorters.simple-sorter', ['target' => '#race-characters'])
        </div>

        <table id="characters" class="table table-hover">
            <thead><tr>
                <th class="avatar"><br /></th>
                <th>{{ __('characters.fields.name') }}</th>
                @if ($campaign->enabled('locations'))
                    <th>{{ __('crud.fields.location') }}</th>
                @endif
                @if ($campaign->enabled('families'))
                    <th>{{ __('characters.fields.families') }}</th>
                @endif
            </tr>
            </thead>
            <tbody>

<?php
$r = $model->allCharacters($allMembers)
    ->has('entity')
    ->with(['families', 'families.entity', 'location', 'location.entity', 'entity'])
    ->filter($filters)
    ->simpleSort($datagridSorter)
    ->paginate(); ?>
            @foreach ($r as $character)
                <tr class="{{ $character->rowClasses() }}">
                    <td>
                        <a class="entity-image" style="background-image: url('{{ $character->getImageUrl(40) }}');" title="{{ $character->name }}" href="{{ route('characters.show', $character->id) }}"></a>
                    </td>
                    <td>
                        @if ($character->is_private)
                            <i class="fas fa-lock" title="{{ __('crud.is_private') }}" data-toggle="tooltip"></i>
                        @endif
                        {!! $character->tooltipedLink() !!}
                        @if ($character->is_dead)
                            <span class="ra ra-skull" data-toggle="tooltip" title="{{ __('characters.hints.is_dead') }}"></span>
                        @endif<br />
                        <i>{{ $character->title }}</i>
                    </td>
                    @if ($campaign->enabled('locations'))
                        <td>
                            @if ($character->location)
                                {!! $character->location->tooltipedLink() !!}
                            @endif
                        </td>
                    @endif
                    @if ($campaign->enabled('families'))
                    <td>
                        @foreach ($character->families as $family)
                            {!! $family->tooltipedLink() !!}<br />
                        @endforeach
                    </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $r->fragment('race-characters')->appends('all_members', request()->get('all_members'))->links() }}
    </div>
    </div>
