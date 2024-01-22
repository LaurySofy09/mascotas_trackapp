require "sinatra"

def WorkShops_content(nombre)
  File.read("WorkShops/#{nombre}.txt")
rescue Errno::ENOENT
  return nil
end

#Metodo que inserta nuevos archivos listas a traves de un formulario web
def save_workshop(nombre, description)
  File.open("WorkShops/#{nombre}.txt", "w") do |file|
    file.print(description)
  end
end

#Metodo que borra elementos de la lista
def delete_workshop(nombre)
  File.delete("WorkShops/#{nombre}.txt")
end

get '/' do
  @files = Dir.entries("WorkShops")
  @valor = 2
  #erb :home #Carga archivo embeded ruby (home)
  erb :lista, layout: :main
end

get '/create' do
  erb :create
end

#Parámetros de la URL
get '/:nombre' do
  @nombre = params[:nombre]
  #Manda informacion al servidor
  @description = WorkShops_content(@nombre)
  erb :taller
end

get '/:nombre/edit' do
  @nombre = params[:nombre]
  @description = WorkShops_content(@nombre)
  erb :edit
end

post '/create' do
  #@nombre = params["nombre"]
  #@description = params["description"]
  save_workshop(params["nombre"],params["description"])
  #{}"<h1>#{@nombre}</h1><p>#{@description}</p>"
  @mensaje = "El taller fue creado exitosamente"
  erb :mensaje
end

delete '/:nombre' do
  delete_workshop(params[:nombre])
    @mensaje = "El taller fue eliminado exitosamente"
  erb :mensaje
end

put '/:nombre' do
  save_workshop(params[:nombre], params["description"])
  redirect "/#{params[:nombre]}"
  #redirect URI.escape("/#{params[:nombre]}") si presenta errores por el valor del caracter entre 2 palabras en la URL
end

#crea listas de archivos
#get '/' do
  #@files = Dir.entries("WorkShops")
  #@files.each do |file|
    #"<a>#{file}</a>"
#end
#end

#get '/' do
#  "<h1>Taller de Sinatra Ruby On Rails</h1>"
#end

#get '/Imagenes' do
#  "<h1>Imagenes del sitio</h1>"
#end

#get '/Contacto' do
#  "<h1>Contactos del sitio</h1>"
#end
