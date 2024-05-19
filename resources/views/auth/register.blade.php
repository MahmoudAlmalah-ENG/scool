@extends('layout.base')

@section('title', 'Home')

@push('styles')
    <style>
        .required:after {
            content:" *";
            color: red;
        }
    </style>
@endpush

@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#"
               class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                {{ config('app.name') }}
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 lg:max-w-3xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('auth.register.store') }}" method="POST">
                        @csrf @method('POST')
                        <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Your name
                                </label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="John Doe"
                                       required=""
                                />
                                @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Your email
                                </label>
                                <input type="email" name="email" id="email"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="name@company.com"
                                       required=""
                                />
                                @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Phone number
                                </label>
                                <input type="tel" name="phone" id="phone"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="+20 123 456 7890"
                                       required=""
                                />
                                @error('phone')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="school"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    School
                                </label>
                                <input type="text" name="school" id="school"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="School name"
                                       required=""
                                />
                                @error('school')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                            <div>
                                <label for="address"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Address
                                </label>
                                <input type="text" name="address" id="address"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="1234 Main St"
                                />
                                @error('address')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="birthday"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Birthdate
                                </label>
                                <input type="date" name="birthday" id="birthday"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                @error('birthdate')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                            <div>
                                <label for="gender"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Gender
                                </label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    id="gender" name="gender" required="">
                                    <option value="{{ \App\Enum\UserEnum::MALE->value }}" selected>
                                        Male
                                    </option>
                                    <option value="{{ \App\Enum\UserEnum::FEMALE->value }}">
                                        Female
                                    </option>
                                </select>

                                @error('gender')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="invitation_code"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Invitation code
                                </label>
                                <input type="text" name="invitation_code" id="invitation_code"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="Invitation code"
                                       required=""
                                />
                                @error('invitation_code')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:gap-4">
                            <div>
                                <label for="password"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Password
                                </label>
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required=""
                                />
                                @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="confirm-password"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Confirm password
                                </label>
                                <input type="password" name="password_confirmation" id="confirm-password"
                                       placeholder="••••••••"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       required=""
                                />
                                @error('password_confirmation')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit"
                            @class([
                                'w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800',
                            ])
                        >
                            Create an account
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account?
                            <a href="{{ route('login') }}"
                               class="font-medium text-primary-600 hover:underline dark:text-primary-500">
                                Login here
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
