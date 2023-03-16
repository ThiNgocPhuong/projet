package com.example.gedimagination;

public class Vote {
    private String code;
    private String email;
    private int vote1;
    private int vote2;
    private int vote3;

    public Vote(){
        this.code="";
        this.email="";
        this.vote1=0;
        this.vote2=0;
        this.vote3=0;
    }

    public String getCode(){return this.code;}

    public String getEmail(){return this.email;}

    public int getVote1(){return this.vote1;}

    public int getVote2(){return this.vote2;}

    public int getVote3(){return this.vote3;}

    public void setCode(String code){this.code=code;}

    public void setEmail(String email){this.email=email;}

    public void setVote1(int vote1){this.vote1=vote1;}

    public void setVote2(int vote2){this.vote2=vote2;}

    public void setVote3(int vote3){this.vote3=vote3;}

    @Override
    public String toString(){
        return "Vote{"+
                "code'" + code + '\''+
                ", email'"+ email + '\''+
                ", vote1'"+ vote1 + '\'' +
                ", vote2'"+ vote2 + '\'' +
                ", vote3'"+ vote3 +
                "}";
    }
}
