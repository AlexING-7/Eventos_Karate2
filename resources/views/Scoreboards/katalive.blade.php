<x-app-layout>
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">

                <div class="pad-all text-center">
                    <h1>KATA</h1>
                </div>
            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                @livewire('LiveKata',['id_combate' => $id_combate])

            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->
    </div>

 
</x-app-layout>