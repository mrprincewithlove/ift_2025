@extends('layouts.admin_base')

@section('my_own_js')
    <script>
        
        //logo full preview
        document.getElementById('logo_full').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('previewLogoFull').src = src
        }

        //logo small preview
        document.getElementById('logo_small').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('previewLogoSmall').src = src
        }

    </script>
@endsection

@section('content')

<div class="container grid w-full px-6 mx-auto ">
    <div class="flex justify-between">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" >
            {{__('information.changeInformation')}}
        </h2>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <form method="POST" action="{{ route('informations.update') }}" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h1 class="title "> {{__('information.images')}} </h1>
                <hr class="my-2">
                <div class="md:flex md:flex-row col-12 gap-4">
                
                    <div class="md:col-4 ">
                            <div class="p-4 mx-0 my-4 rounded-lg row border-2 border-gray-200 focus:border-gray-400  flex flex-row bg-white">                                  
                                <div class="w-full">
                                    <output class="w-52 h-52">
                                        <span>
                                            @if(isset($information->logofull))                                            
                                                <img id="previewLogoFull" class="p-2 border rounded thumb "
                                                    src="{{asset($information->logofull)}}" alt="" />
                                            @else
                                                <img id="previewLogoFull" class="p-2 border rounded thumb "
                                                src="{{asset('images/imageplaceholder.jpg')}}" alt=""/>
                                            @endif
                                        </span>
                                    </output>

                                    <div class="rounded file">
                                        <span > {{__('information.logo_full')}} </span>                                        
                                        <input accept="image/*"
                                            type="file"
                                            id="logo_full"
                                            name="logofull"
                                            value="{{ (isset($information->logofull)) ? $information->logofull : null }}" />
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="md:col-4">
                            <aside class="p-4 mx-0 my-4 rounded-lg row border-2 border-gray-200 focus:border-gray-400  flex flex-row bg-white">
                                <div class="w-full">
                                    <output class="w-52 h-52">
                                            <span>
                                                @if(isset($information->logosmall))
                                                    <img id="previewLogoSmall" class="p-2 border rounded thumb "
                                                        src="{{asset($information->logosmall)}}" alt=""  />
                                                @else
                                                    <img id="previewLogoSmall" class="p-2 border rounded thumb "
                                                    src="{{asset('images/imageplaceholder.jpg')}}" alt=""/>
                                                @endif

                                            </span>
                                        </output>

                                        <div class="rounded file">
                                            <span > {{__('information.logo_small')}} </span>
                                            
                                                <input accept="image/*"
                                                    type="file"
                                                    id="logo_small"
                                                    name="logosmall"
                                                    value="{{ (isset($information->image_ru)) ? $information->image_ru : null }}"
                                                />
                                        </div>
                                </div>
                            </aside>
                    </div>

              </div>
                 
            </div>

            <div class="card">            
                <div class="card-body ">
                    <aside class="row col-12 rounded-lg border-whiteblue">
                        <h1 class="title col-12"> {{__('information.titles')}} </h1>
                        <hr class="my-2"> 

                        <label class="block mt-4 text-sm col-12 col-lg-4">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.title_tm')}}</span>
                            <textarea name="title_tm" id="title_tm" class="w-full px-3 py-2 text-gray-700  border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" rows="4">{{ (isset($information->title_tm)) ? $information->title_tm : null}}</textarea>
                        </label>
                                  
                        <label class="block mt-4 text-sm col-12 col-lg-4">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.title_ru')}}</span>
                            <textarea name="title_ru" id="title_ru" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" rows="4"> {{ (isset($information->title_ru)) ? $information->title_ru : null}}</textarea>
                        </label>

                        <label class="block mt-4 text-sm col-12 col-lg-4">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.title_en')}}</span>
                            <textarea name="title_en" id="title_en" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" rows="4"> {{ (isset($information->title_en)) ? $information->title_en : null}}</textarea>
                        </label>
                                
                    </aside>
                </div>
            </div>

            <div class="card">            
                <div class="card-body ">
                    <aside class="row col-12 rounded-lg border-whiteblue">
                        <h1 class="title col-12"> {{__('information.texts')}} </h1>
                        <hr class="my-2"> 

                        <label class="block mt-4 text-sm col-12 col-lg-4">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.text_tm')}}</span>
                            <input name="text_tm" id="text_tm" value="{{ (isset($information->text_tm)) ? $information->text_tm : null}}" class="w-full px-3 py-2 text-gray-700  border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" />
                        </label>
                                  
                        <label class="block mt-4 text-sm col-12 col-lg-4">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.text_ru')}}</span>
                            <input name="text_ru" id="text_ru" value="{{ (isset($information->text_ru)) ? $information->text_ru : null}}" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" /> 
                        </label>

                        <label class="block mt-4 text-sm col-12 col-lg-4">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.text_en')}}</span>
                            <input name="text_en" id="text_en" value="{{ (isset($information->text_en)) ? $information->text_en : null}}" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" /> 
                        </label>
                                
                    </aside>
                </div>
            </div>

            
            <div class="card">            
                <div class="card-body ">
                    <aside class="row col-12 rounded-lg border-whiteblue">
                        <h1 class="title col-12"> {{__('information.about')}} </h1>
                        <hr class="my-2"> 

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.about_tm')}}</span>
                            <textarea name="about_tm" id="about_tm" class="w-full px-3 py-2 text-gray-700  border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" rows="4">{{ (isset($information->about_tm)) ? $information->about_tm : null }}</textarea>
                        </label>
        
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.about_ru')}}</span>
                            <textarea name="about_ru" id="about_ru" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" rows="4"> {{ (isset($information->about_ru)) ? $information->about_ru : null }}</textarea>
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-600"> {{__('information.about_en')}}</span>
                            <textarea name="about_en" id="about_en" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" rows="4"> {{ (isset($information->about_en)) ? $information->about_en : null }}</textarea>
                        </label>
                          
        
                    </aside>
                </div>
            </div>


            <div class="card">            
                <div class="card-body ">
                    <aside class="row col-12 rounded-lg border-whiteblue">
                        <h1 class="title col-12"> {{__('information.phone')}} </h1>
                        <hr class="my-2"> 

                            <div class="block mb-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-600">
                                    {{__('information.phone1')}}
                                </span>
                                <input id="phone1" type="text" name="phone1"  placeholder="{{__ ('information.required') }}"  value="{{ (isset($information->phone1)) ? $information->phone1 : null }}"
                                    class="block w-full px-2 py-1 my-2 mt-1 text-sm leading-5 border-2 border-gray-200  @error('phone1') focus:shadow-outline-red @enderror rounded-md dark:text-gray-300 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray form-input"/>
                                @error('phone1')
                                    <span class="text-xs text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </span>
                                @enderror
                           </div>
        
                            <div class="block mb-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-600">
                                    {{__('information.phone2')}}
                                </span>
                                <input id="phone2" type="text" name="phone2"  placeholder="{{__ ('information.required') }}"  value="{{ (isset($information->phone2)) ? $information->phone2 : null }}"
                                    class="block w-full px-2 py-1 my-2 mt-1 text-sm leading-5 border-2 border-gray-200 focus:border-gray-400 @error('phone2') border-red-300 focus:border-red-500 focus:shadow-outline-red @enderror rounded-md dark:text-gray-300 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray form-input"/>
                            </div>
        
                    </aside>
                </div>
            </div>

            <div class="card">            
                <div class="card-body ">
                    <aside class="row col-12 rounded-lg border-whiteblue">
                        <h1 class="title col-12"> {{__('information.email')}} </h1>
                        <hr class="my-2"> 

                        <label class="block mb-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-600">
                                {{__('information.email1')}}
                            </span>
                            <input id="email1" type="text" name="email1"  placeholder="{{__ ('information.required') }}"  value="{{ (isset($information->email1)) ? $information->email1 : null }}"
                                class="block w-full px-2 py-1 my-2 mt-1 text-sm leading-5 border-2 border-gray-200 focus:border-gray-400 @error('email1') border-red-300 focus:border-red-500 focus:shadow-outline-red @enderror rounded-md dark:text-gray-300 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray form-input"/>
                          </label>
        
                          <label class="block mb-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-600">
                                    {{__('information.email2')}}
                                </span>
                                <input id="email2" type="text" name="email2"  placeholder="{{__ ('information.required') }}"  value="{{ (isset($information->email2)) ? $information->email2 : null  }}"
                                    class="block w-full px-2 py-1 my-2 mt-1 text-sm leading-5 border-2 border-gray-200 focus:border-gray-400 @error('email2') border-red-300 focus:border-red-500 focus:shadow-outline-red @enderror rounded-md dark:text-gray-300 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray form-input"/>
                          </label>
        
                    </aside>
                </div>
            </div>

            <div class="card">            
                <div class="card-body ">
                    <aside class="row col-12 rounded-lg border-whiteblue">
                        <h1 class="title col-12"> {{__('information.address')}} </h1>
                        <hr class="my-2"> 

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-600"> {{__('information.address_tm')}}</span>
                                <textarea name="address_tm" id="address_tm" class="w-full px-3 py-2 text-gray-700  border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" 
                                    rows="4">{{ (isset($information->address_tm)) ? $information->address_tm : null }}</textarea>
                            </label>
        
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-600"> {{__('information.address_ru')}}</span>
                                <textarea name="address_ru" id="address_ru" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" 
                                    rows="4"> {{ (isset($information->address_ru)) ? $information->address_ru : null }}</textarea>
                            </label>
                          
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-600"> {{__('information.address_en')}}</span>
                                <textarea name="address_en" id="address_en" class="w-full px-3 py-2 text-gray-700 border-2 rounded-lg focus:outline-none focus:border-purple-400 focus:shadow-outline-purple focus:shadow-outline-gray" 
                                    rows="4"> {{ (isset($information->address_en)) ? $information->address_en : null }}</textarea>
                            </label>
        
                          
        
                    </aside>
                </div>
            </div>


            <div class="mt-8">
                <button type="submit" class="items-center px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    {{ __('information.change') }}
                </button>
                <a href="{{ route('informations.edit') }}" type="button" class="items-center px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-500 border border-transparent rounded-md active:bg-gray-800 hover:bg-gry-700 focus:outline-none focus:shadow-outline-purple">
                    {{ __('information.cancel') }}
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
