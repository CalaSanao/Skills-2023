<template>
    <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5">
                                <h3 class="mb-5">Contacto con el administrador</h3>
                                <form>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typeEmailX-2">Nombre</label>
                                        <input type="text" id="typeEmailX-2"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typeEmailX-2">Email</label>
                                        <input type="email" id="typeEmailX-2"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typeEmailX-2">Asunto</label>
                                        <input type="text" id="typeEmailX-2"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="mb-3">
                                      <label for="" class="form-label">Cuerpo del correo</label>
                                      <textarea class="form-control" rows="3"></textarea>
                                    </div>

                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>
