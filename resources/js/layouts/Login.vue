<template>
    <div>
        <div class="login-page">
            <div class="login-box">
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">
                            Sign In
                        </p>

                        <form @submit.prevent="login">
                            <div class="input-group mb-3">
                                <input
                                    v-model="email"
                                    type="email"
                                    class="form-control"
                                    placeholder="Email"
                                    required
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input
                                    v-model="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    required
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember" />
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>

                        <p class="mb-1">
                            <a href="#">Forgot password</a>
                        </p>
                        <p class="mb-0">
                            <a href="#" class="text-center">Register a new membership</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default {
    setup() {
        const email = ref("");
        const password = ref("");
        const router = useRouter();

        const login = async () => {
            try {
                const response = await axios.post(
                    "/api/auth/login",
                    {
                        email: email.value,
                        password: password.value,
                    },
                    {
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },
                    }
                );

                const token = response.data.bearer_token;
                localStorage.setItem("token", token);
                router.push({ name: "dashboard" });
            } catch (error) {
                console.error("Login failed", error);
            }
        };

        return { email, password, login };
    },
};
</script>
