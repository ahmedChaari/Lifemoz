@extends('layouts.menu')
@section('content')
<style>
    .loading-inventory{
        background-color: #f59e0b;

        border-radius: 9px;
    }
</style>

<!-- BEGIN: Product Information
 <button class="btn btn-warning mr-1 mb-2"> Loading <i data-loading-icon="three-dots" data-color="1a202c" class="w-4 h-4 ml-2"></i> </button>
-->
 <div class="intro-y box p-5 mt-5">
    <div class="loading-inventory">
        <div style="margin-bottom: 12px; padding: 11px 5px">
            Statut d'inventaire  :  En cours <i data-loading-icon="spinning-circles" data-color="white" class="w-4 h-4 ml-2"></i>
        </div>
    </div>
    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
        <div class="flex items-center border-b
         dark:border-darkmode-400 pb-5
         intro-y flex flex-col sm:flex-row items-center">
        <h2 class="text-lg font-medium mr-auto">
            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Information Inventaire
        </h2>
             <div class="">
                  <a href="{{ route('inventory.list') }}" class="btn btn-primary w-32 mr-2 mb-2"> <i data-lucide="activity" class="w-4 h-4 mr-2"></i> Liste </a>
                  <button class="btn btn-secondary w-32 mr-2 mb-2"> <i data-lucide="hard-drive" class="w-4 h-4 mr-2"></i> Imprimer </button>
                  <button class="btn btn-success w-32 mr-2 mb-2"> <i data-lucide="calendar" class="w-4 h-4 mr-2"></i> Valider </button>
                  <button class="btn btn-warning w-32 mr-2 mb-2"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i>Modifier IN </button>
            </div>
        </div>
            <div class="row">
                <div class="intro-y box col-md-12 ">
                    <div class="p-5 lg:col-md-6">
                        <div class="tab-content">
                            <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                                <div class="flex items-center">
                                    <div class="border-l-2 border-primary dark:border-primary pl-4">
                                        <a href="" class="font-medium">Objet Inventaire</a>
                                        <div class="text-slate-500">{{ $inventory->objet }}</div>
                                    </div>
                                    <div class="border-l-2 border-primary dark:border-primary ml-auto pl-4" style="margin-left: 50%;">
                                        <a href="" class="font-medium">Date</a>
                                        <div class="text-slate-500">{{ $inventory->created_at }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center mt-5">
                                    <div class="border-l-2 border-primary dark:border-primary pl-4">
                                        <a href="" class="font-medium">Créé Par</a>
                                        <div class="text-slate-500">{{ $inventory->user->fullName }}</div>
                                    </div>
                                    <div class="border-l-2 border-primary dark:border-primary ml-auto pl-4"  style="margin-left: 50%;">
                                        <a href="" class="font-medium">Réference</a>
                                        <div class="text-slate-500">{{ $inventory->reference }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center mt-5">
                                    <div class="border-l-2 border-primary dark:border-primary pl-4">
                                        <a href="" class="font-medium">Dépot</a>
                                        <div class="text-slate-500">{{ $inventory->depot->name }}</div>
                                    </div>
                                    <div class="border-l-2 border-primary dark:border-primary ml-auto pl-4"  style="margin-left: 50%;">
                                        <a href="" class="font-medium">Créé le</a>
                                        <div class="text-slate-500">{{ $inventory->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- END: Product Information -->

 <!-- BEGIN: Product Information -->
 <div class="intro-y box p-5 mt-5">
    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
        <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Listes des produits Inventaire </div>
            <div class="row">
                <div class="intro-y box col-md-12 ">
                    <div class="p-5 lg:col-md-6">
                        <div class="tab-content">
                             <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">RÉFÉRENCE</th>
                        <th class="text-center whitespace-nowrap">DÉSIGNATION</th>
                        <th class="text-center whitespace-nowrap">PRIX D'ACHAT</th>
                        <th class="text-center whitespace-nowrap">STOCK THEORIQUE</th>
                        <th class="text-center whitespace-nowrap">STOCK RÉEL</th>
                        <th class="text-center whitespace-nowrap">ECART</th>
                        <th class="text-center whitespace-nowrap">ECART VALORISÉ</th>
                        <th class="text-center whitespace-nowrap">VALEUR DU STOCK RÉEL</th>
                        <th class="text-center "> ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @if($productInventories->count() > 0 )
                    @foreach($productInventories  as $productInventory)
                    <form method="post" action="{{ route('inventory.get', $productInventory->id ) }}" >
                        @csrf

                        <tr class="intro-x">
                            <td class="w-40">
                                <input type="hidden" name="id" value="{{ $productInventory->id  }}">
                                <a href="" class="font-medium whitespace-nowrap">{{ $productInventory->inventory->reference  }}</a>
                            </td>
                            <td class="text-center"> {{ $productInventory->product->name  }} </td>
                            <td class="text-center"> {{ $productInventory->achat  }} </td>
                            <td class="text-center">
                                <a href="" class="font-medium whitespace-nowrap"> {{ $productInventory->quantite_en_ligne  }} </a>                        </td>
                            </td>
                            <td class="text-center">
                                <input type="number" class=""  name="quantite_en_stock[2]" value="{{ $productInventory->quantite_en_stock  }}">
                            </td>
                            <td class="text-center">
                                @if (($productInventory->quantite_en_ligne - $productInventory->quantite_en_stock)  > 0)
                                <div class="flex items-center justify-center text-success">  {{ $productInventory->quantite_en_ligne - $productInventory->quantite_en_stock  }} </div>
                                @else
                                <div class="flex items-center justify-center text-danger">  {{ $productInventory->quantite_en_ligne - $productInventory->quantite_en_stock  }} </div>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($productInventory->achat * ($productInventory->quantite_en_ligne - $productInventory->quantite_en_stock) > 0)
                                <div class="flex items-center justify-center text-success">
                                    {{$productInventory->achat * ($productInventory->quantite_en_ligne - $productInventory->quantite_en_stock)}}
                                </div>
                                @else
                                <div class="flex items-center justify-center text-danger">
                                    {{$productInventory->achat * ($productInventory->quantite_en_ligne - $productInventory->quantite_en_stock)}}
                                </div>
                                @endif
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    @if (($productInventory->quantite_en_ligne - $productInventory->quantite_en_stock)  > 0)
                                    <div class="flex items-center justify-center text-success">
                                        {{ $productInventory->achat * $productInventory->quantite_en_stock }}
                                    </div>
                                    @else
                                    <div class="flex items-center justify-center text-danger">
                                        {{ $productInventory->achat * $productInventory->quantite_en_stock }}
                                    </div>
                                    @endif
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                   <a class="flex items-center text-danger delete-confirm" href="{{ route('inventory.product.delete',$productInventory->id ) }}">
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="intro-x">
                        <td  class="text-center"></td>
                        <td  class="text-center"></td>
                        <td  class="text-center"></td>
                        <td  class="text-center"></td>
                        <td  class="text-center"></td>
                        <td  class="text-center"></td>
                        <td  class="text-center">
                        @foreach($inventorydata  as $inventorydatas)
                            {{ $inventorydatas->dataCount }}
                        @endforeach
                        </td>
                        <td></td>
                        <td class="text-center "><button type="submit" class="btn btn-elevated-rounded-primary w-24 mr-1 mb-2"> Enregister

                        </button>

                        </td>
                    </tr>
                </form>
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des inventories</h3>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- END: Product Information -->
@endsection
