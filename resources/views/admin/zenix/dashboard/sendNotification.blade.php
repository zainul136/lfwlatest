{{-- Extends layout --}}
@extends('admin.layout.default')



{{-- Content --}}
@section('content')
<div class="container-fluid">
    <h2 class="font-w600 mb-0 text-black">Notification</h2>
    <div class="row">
        <div class="col-xl-6 col-lg-6 w-100">
            <div class="card">
                <div style="display: flex;">
                    <div>
                        <div class="card-header">
                            <h4 class="card-title">Name of Requested person</h4>
                        </div>
                        <div class="card-body py-0 mb-4">
                            <div class="basic-form ">
                                <?php
                                    $userRequest  = \App\Models\User::query()->where('id','=',$deathPersonRequested[0])->first()
                                    ?>
                                <form>
                                    <input type="text" class="form-control wide" value="@if(isset($userRequest)) {{$userRequest->first_name. ' '.$userRequest->last_name ??''}}"  @endif disabled>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-header">
                            <h4 class="card-title">Name of deceased person</h4>
                        </div>
                        <div class="card-body py-0 mb-4">
                            <div class="basic-form ">
                                <form>
                                    <input type="text" class="form-control wide" value="{{$deathPerson->user->first_name. ' '.$deathPerson->user->last_name ??''}}" disabled>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-header">
                            <h4 class="card-title">Date Of Death</h4>
                        </div>
                        <div class="card-body py-0 mb-4">
                            <div class="basic-form ">
                                @if(isset($deathPerson))
                                <?php
                                $originalDate = $deathPerson->date_of_death;
                                $formattedDate = date("n/j/Y", strtotime($originalDate));

                                ?>
                                @endif

                                <form>
                                    <input type="text" class="form-control wide" value="{{$formattedDate ??""}}" disabled>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive table-hover fs-14">

            <table class="table display mb-4 dataTablesCard short-one card-table text-black" id="example6">
                <div class="bg-white d-flex justify-content-between align-items-center py-4">
                    <h2 class="font-w600 mb-0 text-black">Family Members</h2>
                    <button class="main-btn">Save</button>
                </div>
                <thead>
                    <tr>
                        <th>Select</th>
                        <th style="width: 150px !important; ">Name</th>
                        <th>Relation</th>
                        <th>Country</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id="user-info-tbody">
                @if(isset($userRelationships) && $userRelationships->count() > 0)
                    @foreach($userRelationships as $familyMember)

                        <tr>
                            <?php
                                $userName  = \App\Models\User::query()->where('id','=',$familyMember->relative_id)->first();
                                $userRelation  = \App\Models\Relationship::query()->where('id','=',$familyMember->relationship_id)->first();

                                $country = $userName->userInformation->country;
                                $countryName = \App\Models\Country::query()->where('code','=',$country)->first();

                               ?>
                            <td><input type="checkbox"></td>
                            <td style="width: 200px !important;">{{ $userName->first_name . ' ' . $userName->last_name }}</td>
                            <td>{{ $userRelation->type ?? '' }}</td>
                            <td>{{ $countryName->name ?? '' }}</td>
                            <td>{{ $userName->email ?? '' }}</td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection