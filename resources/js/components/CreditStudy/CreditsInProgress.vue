<template>
    <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h3><i class="icon-screen-desktop"></i></h3>
                                            <p class="text-muted">Estudios de creditos iniciados</p>
                                        </div>
                                        <div class="ml-auto">
                                            <h2 class="counter text-primary">{{ creditsInit }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</template>
<script>
export default {
    props:[],
    components:{},
    data () {
        return {
            creditsInit:        0
        }
    },    
}
</script>