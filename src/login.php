<!DOCTYPE html>
<html>
    <head>
        <?php include "head.jsp" ?>
    </head>
    <body>
        <?php include "navigation.jsp" ?>
        <div class="container loginContainer d-flex justify-content-between pd-12">
            <div class="indexImage">
                <img src="../images/Main image 3.png" 
                     width="450"/>
            </div>
            <div class="login">
                <div class="login__content">
                    <div class="login__forms">
                        <form action="<%= request.getContextPath()%>/Login" class="login__registre" id="login-in" method="post">
                            <h1 class="login__title">Welcome Back Star!</h1>
                            <%
                                if (request.getAttribute("errorLogin") != null) {
                            %>
                            <span class="text-danger"><%=request.getAttribute("errorLogin")%></span>
                            <%
                                }

                                if (request.getAttribute("logout") != null) {
                            %>
                            <span class="text-danger"><%=request.getAttribute("logout")%></span>
                            <%
                                }

                                if (request.getAttribute("failedRegister") != null) {
                            %>
                            <span class="text-danger"><%=request.getAttribute("failedRegister")%></span>
                            <%
                                }
                            %>

                            <div class="login__box">
                                <i class='bx bx-user login__icon'></i>
                                <input type="text" placeholder="Username" class="login__input" name="username">
                            </div>

                            <div class="login__box">
                                <i class='bx bx-lock-alt login__icon'></i>
                                <input type="password" placeholder="Password" class="login__input" name="password">
                            </div>

                            <a href="#" class="login__forgot">Forgot password?</a>

                            <button class="login__button">Sign In</button>

                            <div>
                                <span class="login__account">Don't have an Account ?</span>
                                <span class="login__signin" id="sign-up">Sign Up</span>
                            </div>
                        </form>

                        <form action="Register" class="login__create none" id="login-up" method="post">
                            <h1 class="login__title">Create Account</h1>
                            <%
                                if (request.getAttribute("failedRegister") != null) {
                            %>
                            <span class="text-danger"><%=request.getAttribute("failedRegister")%></span>
                            <%
                                }
                            %>
                            <div class="login__box">
                                <i class='bx bx-user login__icon'></i>
                                <input type="text" placeholder="Username" name="username" class="login__input">
                            </div>

                            <div class="login__box">
                                <i class='bx bx-at login__icon'></i>
                                <%
                                    if (request.getAttribute("failedRegister") != null) {
                                        out.println("<input type='email' placeholder='Email'"
                                                + "name='email' value='" + request.getAttribute("email") + "'>");
                                    } else {
                                %>
                                <input type="email" placeholder="Email" name="email" class="login__input">

                                <%
                                    }
                                %>
                            </div>
                            <div class="login__box">
                                <i class='bx bx-lock-alt login__icon'></i>
                                <%
                                    if (request.getAttribute("failedRegister") != null) {
                                        out.println("<input type='password' placeholder='Password'"
                                                + "name='password' value='" + request.getAttribute("password") + "'>");
                                    } else {
                                %>
                                <input type="password" placeholder="Password" name="password" class="login__input">
                                <%
                                    }
                                %>
                            </div>

                            <button class="login__button">Sign Up</button>

                            <div>
                                <span class="login__account">Already have an Account ?</span>
                                <span class="login__signup" id="sign-in">Sign In</span>
                            </div>

                            <div class="login__social">
                                <a href="#" class="login__social-icon"><i class='bx bxl-facebook' ></i></a>
                                <a href="#" class="login__social-icon"><i class='bx bxl-twitter' ></i></a>
                                <a href="#" class="login__social-icon"><i class='bx bxl-google' ></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="<%= request.getContextPath()%>/js/main.js"></script>

        <?php include "footer.html" ?>
    </body>
</html>
