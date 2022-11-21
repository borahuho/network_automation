FROM python:3
ENV PYTHONUNBUFFERED=1
WORKDIR /app

COPY requirements.txt requirements.txt
RUN pip3 install -r requirements.txt


COPY . .

Expose 5000

CMD [ "python", "./app/wheather-app.py", "--host=0.0.0.0", "--port=5000" ]

