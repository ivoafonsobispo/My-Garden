import sys, time, requests

try:
    print("CTRL+C to end the script")
    while True:
        r = requests.get('http://my-garden.test/api/watering')
        if r.status_code == 500:
            print("HTTP Error code 500")
        else:
            print(r.text)
            time.sleep(5)
except KeyboardInterrupt:
    print("\nScript ended by user")
except:
    print("Error:", sys.exc_info())
finally:
    print("End of the script")
