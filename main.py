from typing import List

from fastapi import FastAPI, Request, Response, Depends
from fastapi.responses import PlainTextResponse, HTMLResponse

from sqlalchemy.orm import Session

from .db import models, crud, schemas
from .db.database import SessionLocal, engine

models.Base.metadata.create_all(bind=engine)
app = FastAPI()


@app.middleware("http")
async def db_session_middleware(request: Request, call_next):
    response = Response("Internal Server Error", status_code=500)
    try:
        request.state.db = SessionLocal()
        response = await call_next(request)
    finally:
        request.state.db.close()
    return response


def get_db(request: Request):
    return request.state.db


@app.get("/")
async def index():
    return HTMLResponse(open("/app/app/index.html").read())


@app.get("/index.js")
async def index_js():
    return Response(open("/app/app/index.js").read(), media_type="application/javascript")


@app.post("/api/key")
async def post_key(key: schemas.Key, db: Session = Depends(get_db)):
    key_id = crud.create_key(db, key.name, key.value)
    if not key_id:
        return PlainTextResponse(f"Key with name='{key.name}' already exists!", status_code=400)
    else:
        return key_id


@app.get("/api/keys", response_model=List[schemas.Key])
async def get_keys(db: Session = Depends(get_db)):
    return crud.get_all_keys(db)

