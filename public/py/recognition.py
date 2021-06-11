import face_recognition
import cv2 as cv
import requests
import time

# Função que envia os dados acerca do reconhecimento facial para a API
def send_to_api(array):
    r = requests.post('http://my-garden.test/api/change-door-server', data=array)
    if r.status_code == 200:
        print(r.json())
    else:
        print("ERRO: Não foi possível realizar o pedido")

# Função que envia os dados acerca do reconhecimento facial para a API
def get_door_state():
    r = requests.get('http://my-garden.test/api/get-state-door')
    if r.status_code == 200:
        return r.json()
    else:
        print("ERRO: Não foi possível realizar o pedido")

# Função que é responsável pela captura da imagem do utilizador do script
def capture_image():
    cap = cv.VideoCapture(0)
    while True:
        _, img = cap.read()
        gray = cv.cvtColor(img, cv.COLOR_BGR2GRAY)
        cv.imshow('Webcam', img)
        # A foto só é tirada se o utilizador pressionar ESC(27) na janela da webcam
        k = cv.waitKey(30) & 0xff
        if(k == 27):
            break
    cap.release()
    cv.destroyAllWindows()
    return img

try:
    print("***Início do programa***\n")
    print("Caso pretenda terminar o programa, pressione CTRL+C.")
    print("Clique ESC para fazer uma captura da sua cara.")

    # Chamada da função para tirar uma foto sendo a mesma guardada na pasta do script com o nome "face.jpg"
    image = capture_image()
    cv.imwrite('face.jpg', image)

    # Carregamento das imagens dos utilizadores conhecidos, bem como a imagem tirada anteriormente, para arrays
    ivo_image = face_recognition.load_image_file("face_ivo.jpg")
    jose_image = face_recognition.load_image_file("face_jose.jpg")
    unknown_image = face_recognition.load_image_file("face.jpg")

    try:
        print("A fazer o reconhecimento facial...")
        # Obter um encoding para cada face na imagem
        # Como sabemos que apenas irá haver uma face em cada imagem obtemos o primeiro valor do array
        jose_face_encoding = face_recognition.face_encodings(jose_image)[0]
        ivo_face_encoding = face_recognition.face_encodings(ivo_image)[0]
        unknown_face_encoding = face_recognition.face_encodings(unknown_image)[0]
    except IndexError:
        print("Não foi possível localizar nenhuma cara na imagem. Abortar...")
        quit()

    known_faces = [
        jose_face_encoding,
        ivo_face_encoding
    ]

    # O resultado é um array de True/False que diz se a face "desconhecida" é
    # reconhecida por uma das faces de "know_faces"
    results = face_recognition.compare_faces(known_faces, unknown_face_encoding)

    # Estrutura de decisão, caso seja reconhecida a face "desconhecida" chama a função "send_to_api"
    # para o envio dos dados necessários para a abertura da porta do server room
    if results[0] == True:
        array = {'name':'José Areia', 'value':'1'}
        send_to_api(array)
    elif results[1] == True:
        array = {'name':'Ivo Bispo', 'value':'1'}
        send_to_api(array)
    else:
        print("O sistemas não consegui-o reconhecer a sua cara.")

    time.sleep(7)

    door_state = get_door_state()
    if door_state == False:
        print("Aviso! A porta foi fechada.")

except KeyboardInterrupt:
    print("\nProgama terminado pelo utilizador!")
finally:
    print("\n***Fim do programa***")
