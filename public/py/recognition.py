import cv2 as cv
import face_recognition
import requests

def send_to_api(array):
    r = requests.post('http://my-garden.test/api/change-door-server', data=array)
    if r.status_code == 200:
        print(r.json())
    else:
        print("ERRO: Não foi possível realizar o pedido")

def capture_image():
    cap = cv.VideoCapture(0)
    while True:
        _, img = cap.read()
        gray = cv.cvtColor(img, cv.COLOR_BGR2GRAY)
        cv.imshow('webcam', img)
        k = cv.waitKey(30) & 0xff
        if(k == 27):
            break
    cap.release()
    cv.destroyAllWindows()
    return img

image = capture_image()
print("A analisar a foto...")
cv.imwrite('face.jpg', image)

ivo_image = face_recognition.load_image_file("face_ivo.jpg")
jose_image = face_recognition.load_image_file("face_jose.jpg")
unknown_image = face_recognition.load_image_file("face.jpg")

try:
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

results = face_recognition.compare_faces(known_faces, unknown_face_encoding)

if results[0] == True:
    array = {'name':'José Areia', 'value':'1'}
    send_to_api(array)
elif results[1] == True:
    array = {'name':'Ivo Bispo', 'value':'1'}
    send_to_api(array)
else:
    print("O sistemas não consegui-o reconhecer a sua cara.")
