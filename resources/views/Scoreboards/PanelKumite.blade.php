<x-app-layout>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                
                <div class="pad-all text-center">
                    <h3>Combate Kumite</h3>
                    <p>Panel de Control</p>
                    <p>________________</p>
                    
                </div>
            </div>

            
            <!--Page content-->
            <!--===================================================-->
            @livewire('Kumite.ScoreboardKumite',['id_combate'=>$id_combate,'remaining'=>$remaining])
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
    </div>
</x-app-layout>

