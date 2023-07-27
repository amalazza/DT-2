<template>
    <div class="header-right d-flex align-items-center justify-content-end">
        <div class="site-nav-menu">
            <ul class="primary-menu">
                <li class="pore">
                    <router-link class="nav-link" :to="{ name: 'Home' }">{{
                        $t("Home")
                    }}</router-link>
                </li>
                <li v-if="visibility.is_about_page" class="pore">
                    <router-link class="nav-link" :to="{ name: 'About' }">{{
                        $t("About")
                    }}</router-link>
                </li>
                <li v-if="visibility.is_about_page" class="pore">
                    <router-link class="nav-link" :to="{ name: 'Anggota' }">{{
                        $t("Anggota")
                    }}</router-link>
                </li>
                <li v-if="visibility.is_contact_page" class="pore">
                    <router-link class="nav-link" :to="{ name: 'Contact' }">{{
                        $t("Contact")
                    }}</router-link>
                </li>
                <li v-if="visibility.is_quote_page" class="mobile-quote">
                    <a href="/admin/login" class="nav-link">{{
                        $t("Login")
                    }}</a>
                </li>
            </ul>
            <a href="#" class="nav-close"><i class="fas fa-times"></i></a>
        </div>

        <div class="header-extra d-flex align-items-center">
            <div class="nav-toggler">
                <span></span><span></span><span></span>
            </div>
            <div v-if="visibility.is_quote_page" class="navbar-btn">
                <a href="/admin/login" class="nav-link">{{ $t("Login") }}</a>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters({
            visibility: "index/getVisibility",
        }),
    },
    mounted() {
        $(".dd-trigger").on("click", function () {
            $(".dd-trigger i").toggleClass("fa-minus fa-plus");
        });

        // Open menu on toggler click
        $(".nav-toggler").on("click", function (e) {
            $(".site-nav-menu").toggleClass("menu-opened");
            e.preventDefault();
            $(this).toggleClass("menu-opened");
        });
        // Close menu on toggler click
        $(".nav-close").on("click", function (e) {
            $(".site-nav-menu").removeClass("menu-opened");
            $(".nav-toggler").removeClass("menu-opened");
            e.preventDefault();
        });
        // check browser width in real-time
        function breakpointCheck() {
            var windoWidth = window.innerWidth;
            if (windoWidth <= 991) {
                $(".header-right").addClass("breakpoint-on");
            } else {
                $(".header-right").removeClass("breakpoint-on");
            }
        }
        breakpointCheck();
        $(window).on("resize", function () {
            breakpointCheck();
        });
    },
    methods: {
        toLogin() {
            this.$router.push({ path: "/admin/login" });
        },
    },
};
</script>

<style></style>
