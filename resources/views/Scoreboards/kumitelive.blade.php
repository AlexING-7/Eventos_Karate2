<x-app-layout>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">

                <div class="pad-all text-center">
                    <h3>COMBATE KUMITE</h3>
                    <br>
                    <br>

                </div>
            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                @livewire('Kumite.LiveKumite',['id_combate' => $id_combate])

            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
    </div>

 
</x-app-layout>