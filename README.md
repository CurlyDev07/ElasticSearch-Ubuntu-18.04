# ElasticSearch-Ubuntu-18.04


# Download and install the Debian package manually

1. wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.4.2-amd64.deb

2. wget https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-7.4.2-amd64.deb.sha512
  shasum -a 512 -c elasticsearch-7.4.2-amd64.deb.sha512
  
3. sudo dpkg -i elasticsearch-7.4.2-amd64.deb

# SysV init vs systemd

4. ps -p 1

#Running Elasticsearch with SysV 
Use the update-rc.d command to configure Elasticsearch to start automatically when the system boots up

# Elasticsearch can be started and stopped using the service command:
> sudo -i service elasticsearch start
> sudo -i service elasticsearch stop

If Elasticsearch fails to start for any reason, it will print the reason for failure to STDOUT. Log files can be found in /var/log/elasticsearch/.

# Run this to your terminal to check if the installation is successfully installed
curl -X GET "localhost:9200/?pretty"


which should give you a response something like this:

{
  "name" : "Cp8oag6",
  "cluster_name" : "elasticsearch",
  "cluster_uuid" : "AT69_T_DTp-1qgIJlatQqA",
  "version" : {
    "number" : "7.4.2",
    "build_flavor" : "default",
    "build_type" : "tar",
    "build_hash" : "f27399d",
    "build_date" : "2016-03-30T09:51:41.449Z",
    "build_snapshot" : false,
    "lucene_version" : "8.2.0",
    "minimum_wire_compatibility_version" : "1.2.3",
    "minimum_index_compatibility_version" : "1.2.3"
  },
  "tagline" : "You Know, for Search"
}

# Elastic Search link tutorial ubuntu 
https://www.elastic.co/guide/en/elasticsearch/reference/current/deb.html#deb-sysv-init-vs-systemd

# Youtube tutorial
https://www.youtube.com/watch?v=-F-yVKFbNaI&t=19s
https://www.youtube.com/watch?v=3xb1dHLg-Lk
