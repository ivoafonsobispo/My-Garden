import requests
import sys

# Função que envia os dados em modo POST para a API
def send_to_api(array):
    print(array)
    r = requests.post('http://my-garden.test/api/plants', data=array)
    if r.status_code == 201:
        print(r.json())
    else:
        invalid_pedido()

# Função que faz o GET dos dados da API
def get_cenouras():
    r = requests.get('http://my-garden.test/api/cenouras')
    if r.status_code == 200:
        return r.json()
    else:
        invalid_pedido()

# Função que faz o GET dos dados da API
def get_alfaces():
    r = requests.get('http://my-garden.test/api/alfaces')
    if r.status_code == 200:
        return r.json()
    else:
        invalid_pedido()

# Função que faz o GET dos dados da API
def get_tomates():
    r = requests.get('http://my-garden.test/api/tomates')
    if r.status_code == 200:
        return r.json()
    else:
        invalid_pedido()

# Caso a opção do menu seja inválida apresenta mensagem
def invalid():
   print("OPÇÃO INVÁLIDA!")

# Caso o POST não tenha sido bem realizado
def invalid_pedido():
   print("ERRO: Não foi possível realizar o pedido")

try :
    print("Caso pretenda terminar o programa, pressione CTRL+C.")
    while True:
        # cria o dicionário menu plantas
        menu_plants = {"1":"Cenouras",
                "2":"Alfaces",
                "3":"Tomates" }

        # aprenseta o menu plantas
        print("\n**MENU PLANTAÇÕES**\n")
        for key in sorted(menu_plants.keys()):
            print(key+":" + menu_plants[key])

        # pede a opção
        ans = int(input("Opção: "))
        
        if ans == 1:
            # Recebe os values das cenouras
            cenouras_values = get_cenouras()

            # Cria o dicionário menu sensores
            menu_sensor_cenoura = {"1":"Temperatura Atual: " + str(cenouras_values['temperature']) + " ºC",
                "2":"Luminosidade Atual: " + str(cenouras_values['luminosity']) + " %",
                "3":"Humidade Atual: " + str(cenouras_values['humidity']) + " %",
                "4":"Vento Atual: " + str(cenouras_values['wind']) + " km/h" }
            
            # Aprenseta o menu cenouras
            print("\n**MENU CENOURAS**\n")
            for key in sorted(menu_sensor_cenoura.keys()):
                print(key+":" + menu_sensor_cenoura[key])

            # Pede a opção
            ans_cenouras = int(input("Opção: "))
            
            if ans_cenouras == 1:
                ans_cenouras_temp = int(input("Temperatura: "))
                # Altera a variável Temperatura para a inserida
                cenouras_values['temperature'] = ans_cenouras_temp      

            elif ans_cenouras == 2:
                ans_cenouras_lum = int(input("Luminosidade: "))
                # Altera a variável Luminosidade para a inserida
                cenouras_values['luminosity'] = ans_cenouras_lum 
            
            elif ans_cenouras == 3:
                ans_cenouras_hum = int(input("Humidade: "))
                # Altera a variável Humidade para a inserida
                cenouras_values['humidity'] = ans_cenouras_hum 

            elif ans_cenouras == 4:
                ans_cenouras_wind = int(input("Vento: "))
                # Altera a variável Vento para a inserida
                cenouras_values['wind'] = ans_cenouras_wind 

            else:
                # Opção inválida
                menu_sensor_cenoura.get(ans_cenouras,[None,invalid])[1]()
                
            # Cria e Envia o dicionário para ser enviado para a API, com os novos valores
            values = {'name':'cenouras', 
                'temperature':cenouras_values['temperature'], 
                'luminosity':cenouras_values['luminosity'],
                "humidity":cenouras_values['humidity'],
                'wind':cenouras_values['wind'],
                'light':cenouras_values['light'],
                'watering':cenouras_values['watering'],
                'window_state':cenouras_values['window_state']}
            send_to_api(values)
                
        elif ans == 2:
            # Recebe os values das alfaces
            alfaces_values = get_alfaces()

            # Cria o dicionário menu sensores
            menu_sensor_alfaces = {"1":"Temperatura Atual: " + str(alfaces_values['temperature']) + " ºC",
                "2":"Luminosidade Atual: " + str(alfaces_values['luminosity']) + " %",
                "3":"Humidade Atual: " + str(alfaces_values['humidity']) + " %",
                "4":"Vento Atual: " + str(alfaces_values['wind']) + " km/h" }
            
            # Aprenseta o menu alfaces
            print("\n**MENU ALFACES**\n")
            for key in sorted(menu_sensor_alfaces.keys()):
                print(key+":" + menu_sensor_alfaces[key])

            # Pede a opção
            ans_alfaces = int(input("Opção: "))
            
            if ans_alfaces == 1:
                ans_alfaces_temp = int(input("Temperatura: "))
                # Altera a variável Temperatura para a inserida
                alfaces_values['temperature'] = ans_alfaces_temp      

            elif ans_alfaces == 2:
                ans_alfaces_lum = int(input("Luminosidade: "))
                # Altera a variável Luminosidade para a inserida
                alfaces_values['luminosity'] = ans_alfaces_lum 
            
            elif ans_alfaces == 3:
                ans_alfaces_hum = int(input("Humidade: "))
                # Altera a variável Humidade para a inserida
                alfaces_values['humidity'] = ans_alfaces_hum 

            elif ans_alfaces == 4:
                ans_alfaces_wind = int(input("Vento: "))
                # Altera a variável Vento para a inserida
                alfaces_values['wind'] = ans_alfaces_wind 

            else:
                # Opção inválida
                menu_sensor_alfaces.get(ans_alfaces,[None,invalid])[1]()
                
            # Cria e Envia o dicionário para ser enviado para a API, com os novos valores
            values = {'name':'alfaces', 
                'temperature':alfaces_values['temperature'], 
                'luminosity':alfaces_values['luminosity'],
                "humidity":alfaces_values['humidity'],
                'wind':alfaces_values['wind'],
                'light':alfaces_values['light'],
                'watering':alfaces_values['watering'],
                'window_state':alfaces_values['window_state']}
            send_to_api(values)
        
        elif ans == 3:
            # Recebe os values das tomates
            tomates_values = get_tomates()

            # Cria o dicionário menu sensores
            menu_sensor_tomates = {"1":"Temperatura Atual: " + str(tomates_values['temperature']) + " ºC",
                "2":"Luminosidade Atual: " + str(tomates_values['luminosity']) + " %",
                "3":"Humidade Atual: " + str(tomates_values['humidity']) + " %",
                "4":"Vento Atual: " + str(tomates_values['wind']) + " km/h" }
            
            # Aprenseta o menu tomates
            print("\n**MENU TOMATES**\n")
            for key in sorted(menu_sensor_tomates.keys()):
                print(key+":" + menu_sensor_tomates[key])

            # Pede a opção
            ans_tomates = int(input("Opção: "))
            
            if ans_tomates == 1:
                ans_tomates_temp = int(input("Temperatura: "))
                # Altera a variável Temperatura para a inserida
                tomates_values['temperature'] = ans_tomates_temp      

            elif ans_tomates == 2:
                ans_tomates_lum = int(input("Luminosidade: "))
                # Altera a variável Luminosidade para a inserida
                tomates_values['luminosity'] = ans_tomates_lum 
            
            elif ans_tomates == 3:
                ans_tomates_hum = int(input("Humidade: "))
                # Altera a variável Humidade para a inserida
                tomates_values['humidity'] = ans_tomates_hum 

            elif ans_tomates == 4:
                ans_tomates_wind = int(input("Vento: "))
                # Altera a variável Vento para a inserida
                tomates_values['wind'] = ans_tomates_wind 

            else:
                # Opção inválida
                menu_sensor_tomates.get(ans_tomates,[None,invalid])[1]()
                
            # Cria e Envia o dicionário para ser enviado para a API, com os novos valores
            values = {'name':'tomates', 
                'temperature':tomates_values['temperature'], 
                'luminosity':tomates_values['luminosity'],
                "humidity":tomates_values['humidity'],
                'wind':tomates_values['wind'],
                'light':tomates_values['light'],
                'watering':tomates_values['watering'],
                'window_state':tomates_values   ['window_state']}
            send_to_api(values)

        else:
            # opção inválida
            menu_plants.get(ans,[None,invalid])[1]()

except KeyboardInterrupt: # caso haja interrupção de teclado CTRL+C
    print( "Programa terminado pelo utilizador")

except : # caso haja um erro qualquer
    print( "Ocorreu um erro:", sys.exc_info() )

finally : # executa sempre, independentemente se ocorreu exception
    print( "Fim do programa") 
