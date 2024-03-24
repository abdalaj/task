<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <Link class="navbar-brand" href="/">My Task</Link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <Link class="nav-link" href="/">Home </Link>
                </li>
                <li class="nav-item active">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">
                            {{ language == 'ar' ? 'العربيه' : 'english' }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" @click="changeLanguage('ar')">العربيه</a>
                            <a class="dropdown-item" @click="changeLanguage('en')">english</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item mx-1">
                    <div class="dropdown">
                        <button class="btn btn-danger " @click="logout" type="submit">
                            logout
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-12">
            <slot></slot>
        </div>
    </div>
</template>
<script setup>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

const language = window.language;
const changeLanguage = (lang) => {
    window.location.href = route('change-language', lang);
}
const logout = async () => {
    await axios.post(route('logout'))
    window.location.href = '/'
}
</script>
