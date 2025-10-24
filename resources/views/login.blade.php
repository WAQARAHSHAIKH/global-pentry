  @extends('layout.app')
  @section('content')
  
  <main  class="bg-gray-100 font-sans min-h-screen flex items-center justify-center p-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-2xl overflow-hidden">

            <div class="bg-primary text-white p-6 text-center">
                <h1 class="text-3xl font-bold">The Global Pantry</h1>
                <p class="text-sm mt-1 opacity-90">Unlock full ingredients and tutorials.</p>
            </div>

            <div class="flex border-b border-gray-200">
                <button id="tabLogin" onclick="switchForm('login')"
                    class="flex-1 py-3 text-lg font-semibold border-b-2 border-primary text-primary transition duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i> Log In
                </button>
                <button id="tabRegister" onclick="switchForm('register')"
                    class="flex-1 py-3 text-lg font-semibold text-gray-500 border-b-2 border-transparent hover:border-gray-300 transition duration-300">
                    <i class="fas fa-user-plus mr-2"></i> Register
                </button>
            </div>

            <div class="p-8">

                <form id="loginForm" class="space-y-6">
                    <div>
                        <label for="loginEmail" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="loginEmail" name="email" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary"
                            autocomplete="email">
                    </div>

                    <div>
                        <label for="loginPassword" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="loginPassword" name="password" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary"
                            autocomplete="current-password">
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:bg-opacity-90 transition duration-300 uppercase transform hover:scale-[1.01]">
                        <i class="fas fa-unlock-alt mr-2"></i> Log In
                    </button>
                </form>

                <form id="registerForm" class="space-y-6 hidden">
                    <div>
                        <label for="registerName" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="registerName" name="name" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="registerEmail" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="registerEmail" name="email" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary"
                            autocomplete="email">
                    </div>

                    <div>
                        <label for="registerPassword" class="block text-sm font-medium text-gray-700">Choose
                            Password</label>
                        <input type="password" id="registerPassword" name="password" required
                            class="mt-1 block w-full border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary"
                            autocomplete="new-password">
                    </div>

                    <button type="submit"
                        class="w-full bg-secondary text-gray-900 font-bold py-3 px-4 rounded-lg shadow-lg hover:bg-opacity-90 transition duration-300 uppercase transform hover:scale-[1.01]">
                        <i class="fas fa-paper-plane mr-2"></i> Create Account
                    </button>
                </form>

            </div>
        </div>

    </main>

    @endsection