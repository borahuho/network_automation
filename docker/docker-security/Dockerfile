FROM ubuntu:18.04

LABEL maintainer="Patrick Hulshof"

#add unprivileged users
#add sudo group for root access
RUN groupadd -r patrick && useradd -r -g patrick patrick
RUN chsh -s /usr/sbin/nologin root
RUN mkdir /home/patrick

#install applications
RUN apt-get update && \
        apt-get install -y \
        vim \
        dnsutils \
        net-tools \
        iputils-ping

# Env variables
ENV HOME /home/patrick
ENV DEBIAN_FRONTEND=noninteractive