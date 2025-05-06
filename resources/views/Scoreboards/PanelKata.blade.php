<x-app-layout>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                
                <div class="pad-all text-center">
                    <h3>Combate Kata</h3>
                    
                </div>
            </div>

            
            <!--Page content-->
            <!--===================================================-->
            @livewire('PaneldeControlKata',['id_combate' => $id_combate])
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
    </div>
</x-app-layout>

