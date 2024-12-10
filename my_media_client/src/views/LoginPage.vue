<template>
    <div class="d-flex justify-content-center">
        <p class="btn btn-sm mx-3 my-5" @click="home()">Home</p>
        <p class="btn btn-sm mx-3 my-5 bg-dark" @click="login()">Login</p>
    </div>
    <div class="row mb-5">
        <div class="col-6 offset-3">
            <div class="card shadow rounded">
                <div class="card-body p-4">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter email..." v-model="userData.email">
                            <span class="text-danger" v-if="userCheck.email">Email Field is required!</span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Enter password..." v-model="userData.password">
                            <span class="text-danger" v-if="userCheck.password">Password Field is required!</span>
                        </div>
                        <button type="button" class="btn btn-sm " @click="loginProcess()">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" src="../js/loginProcess.js"></script>
