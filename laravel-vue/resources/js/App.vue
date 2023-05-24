<template>
    <div>
        <h1>My App Example</h1>
        <my-header></my-header>
        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
import header from './components/siteHeader';

export default {
    name: 'app',
    components: {
        'myHeader': header,
    }
}
</script>

