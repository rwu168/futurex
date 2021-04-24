from pydantic import BaseModel


class Key(BaseModel):
    name: str
    value: str

    class Config:
        orm_mode = True
